Dropzone.autoDiscover = false;

$(function() {
		
    var html = $('html');
    var body = $('body');
    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
	
	
	/** Lightbox **/
	if(typeof(lightbox) != "undefined") {
	    lightbox.option({
	        'resizeDuration': 200,
	        'wrapAround': true
	    });
    }

    /** Summernote WYSIWYG **/
    if($('.summernote').length > 0) {
        $('.summernote').summernote({
            minHeight: 200
        });
    }
    
    /****************************************
	Change Payment Status and Content
	****************************************/
    var selectedPayment = $("select[name=paymentStatus] option:first").val();
    if(typeof(selectedPayment) != "undefined"){
		$(".payment[data-payment='"+selectedPayment+"']").show();
	}
	
	$("body").on("change", "select[name=paymentStatus]", function(){
		$(".payment").hide();
		var selectedPayment = $("select[name=paymentStatus]").val();
		$(".payment[data-payment='"+selectedPayment+"']").show();
	});
	
	/****************************************
	Autocomplete Last name
	****************************************/
	$('#autocomplete_lastname').autocomplete({
        source: "/admin/orders/search_lastname.json",
        select: function (a, b) {
             $.ajax({
                type: 'POST',
                url: '/admin/orders/get_customer',
                data: {'lastname': b.item.value},
                dataType: 'json',

                //On success
                success: function (resp) {
	                console.log(resp);
                    //Set all call back info to html
                    $('.initials').val(resp.initials);
                    $('.lastname_prefix').val(resp.lastname_prefix);
                    $('.telephone').val(resp.telephone);
                    $('.email').val(resp.email);

                    $('.street').val(resp.address.street);
                    $('.housenumber').val(resp.address.number);
                    $('.postalcode').val(resp.address.postalcode);
                    $('.city').val(resp.address.city);
                    $('.phone_number').val(resp.telephone);

                }
            });
        }
    });
    
    $('.autocomplete_products').autocomplete({
	    source: "/admin/products/search.json",
        scroll: true,
        max: 20,
        select: function (event, ui) {
            var productRowIndex = $(this).closest("tr").attr("data-product-row");
			addQuestions(ui.item.value, productRowIndex);
			addIMEI(productRowIndex);
        }
    });
	
    /** Menu **/
    /*var expandMenu = !$('#page-wrapper').hasClass('nav-closed');

    if(!expandMenu){
        Cookies.remove('expmenu');
        $("#page-wrapper, #wrapper, #nav-wrapper").addClass("nav-closed");
    } else {
        Cookies.set('expmenu', true);
        $("#page-wrapper, #wrapper, #nav-wrapper").removeClass("nav-closed");
    }

    $("li.toggle-menu a").click(function(){

        $(".sidebar .fa-chevron-right").toggle();
        $(".sidebar .fa-chevron-left").toggle();
        $(".navbar-default.sidebar").toggleClass("closed");
        $("#page-wrapper, #wrapper, #nav-wrapper").toggleClass("nav-closed");

        // Inverse status
        expandMenu = !expandMenu;

        if(!expandMenu){
            Cookies.remove('expmenu');
        } else {
            Cookies.set('expmenu', true);
        }
        return false;

    });
*/

    /** Program Lines **/
    if(typeof(programLineI) != "undefined") {
        addProgramLine();
    }


    body.on('click', '.event-image .ajax-delete', function() {

        var url = $(this).attr('href');
        var element = $(this);
        element.closest('.event-image').fadeOut();
		
		$("input[name=image_id]").val("");
		$("form button").click();
		
/*
		if($(this).hasClass("ajax-delete-speaker")){
			$("#speaker-image-id").val("");
			$("form button").click();
		}
*/
		
        $.ajax({
            url: url,
            method: 'POST'
        })
        .done(function() {
        })
        .fail(function() {
            //element.closest('.event-image').show();
        })
        ;
        return false;
    });

	if($('.editable').length > 0){
	    $('.editable').editable({
	        mode: 'inline'
	    });
    }
	
	body.on('focus', '.editable-input input', function() {
		
	   	$(this).closest(".thumbnail").addClass("hovered");
	    
	    $(this).blur(function() {
	        $(this).closest(".thumbnail").removeClass("hovered");
	    });
		
	});

	if($(".dropzone").length > 0) {
	    // Create dropzone instance
	    var dropzone = new Dropzone('.dropzone');
	
	    // Dropzone child features
	    {
	
	        // Get element in jQuery object
	        var dropzoneElement = $(dropzone.element);
	
	        // When dst-id data attribute available
	        if(typeof(dropzoneElement.data('dst-id')) != "undefined") {
	
	            // When to use image ID after upload
	            if (dropzoneElement.data('dst-id').length > 0) {
	
	                // Upload complete
	                dropzone.on("complete", function (file) {
	
	                    // Parse response
	                    var jsonResponse = JSON.parse(file.xhr.response);
	
	                    // Set image ID to destination
	                    $('#' + dropzoneElement.data('dst-id')).val(jsonResponse.image.id);
	
	                    // Show after upload notice
	                    // $('.after-media-upload-notice').fadeIn();
	
	                    //
	                    $('.current-media-image img').attr('src', jsonResponse.image.url);
	
	                    if (dropzoneElement.hasClass("dropzone-one-image")) {
	
	                        $("form button").click();
	                    }
	
	
	                });
	
	            }
	
	        }
	
	    }
	    
	}
	
	
	
	var productTable = $(".table-add-products");
	var rowCount = 0;
	var totalPrice = 0;
	var newRow = $(productTable).find("tr.product:last").clone();
	
	/****************************************
	Orders Index > Check all Checkboxes
	****************************************/
    var checkedCheckboxes = 0;
    $(".change-bulk-status").prop("disabled", true);
    
    html.on("click", ".orders-table input[type=checkbox]", function(){
		disableBulkStatus();
	});
	
	html.on("click", "#toggleAllOrders", function(){
		
		if($(this).is(':checked')){
			
			$("td.checkCheckbox").each(function(){
			
				$(this).find("input[type=checkbox]").prop( "checked", true );
				
			});
			
		} else {
			
			$("td.checkCheckbox").each(function(){
			
				$(this).find("input[type=checkbox]").prop( "checked", false );
				
			});
			
		}
		disableBulkStatus();
	});
	
	// Reset All Checkboxes
	html.on("change", ".checkCheckbox input", function(){
		$("td.checkCheckbox").each(function(){
			if ($(this).find("input:checkbox:checked").length > 0) {
				$("#toggleAllOrders").prop( "checked", false );
			}
		});
	});


    /*********************
     * Order bulk update *
     *********************/

    html.on('change', 'form.search input[name="bulk"][type="checkbox"], form.search input[name="bulk_toggle"][type="checkbox"]', function() {
        var selectedCount = $('form.search input[name="bulk"][type="checkbox"]:checked').length;

        $('label[for="bulk-order-status"]').text($('#bulk-order-status').data('tpl').replace("{selected}", selectedCount));
    });

    html.on('change', '#bulk-order-status', function() {

        var bulkEl = $(this);
        var form = bulkEl.closest('form');

        // Extract all IDs
        var selectedIds = [];
        $('form.search input[name="bulk"][type="checkbox"]:checked').each(function() {
            selectedIds.push($(this).val());
            $(this).parent().parent().addClass("inactive");
        });

        // Skip if no orders selected
        if(selectedIds.length == 0)
            return;


        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: {
                'status': bulkEl.val(),
                'order': selectedIds
            },
            dataType: 'json',
            success: function () {
                $('form.search').submit();
                $("table.orders-table tr").removeClass('inactive');
            }
        });

    });
    
    function disableBulkStatus(){
	    $(".change-bulk-status").prop("disabled", true);
		checkedCheckboxes = $(".orders-table input:checkbox:checked").length;
		if(checkedCheckboxes > 0){
			$(".change-bulk-status").prop("disabled", false);
		}
    }
	
	/****************************************
	Order View Page
	****************************************/
	$(".orders.view tr.product").each(function(){
		var price = $(this).find(".price-by-customer").attr("data-price");
        var normalPrice = $(this).find(".price-by-customer").attr("data-max-price");
        var minimalPrice = $(this).find(".price-by-customer").attr("data-min-price");
        var newPriceAttr = $(this).find(".price-by-reviewer").attr("data-new-price");
        var productInfluenceSum = 0;
        
        $(this).find(".questions .by-reviewer").each(function(){

            if($(this).is(':checked')){
                productInfluenceSum += parseFloat($(this).data("influence"));
            }

        });
        
        if($(this).find("input.by-reviewer:checked").length > 0) {
	        $(this).find(".price-by-reviewer").show();
	    }
        
        var newPrice = normalPrice - productInfluenceSum;
        
        if(newPrice < minimalPrice){
            newPrice = parseFloat(minimalPrice);
        }

        newPrice = newPrice.toFixed(2);
        
        if(newPrice == price){
            $(this).find(".notification").hide();
            $(this).find(".price").removeClass("old-price");
            $(this).find(".new-price").hide();
        }
        
        $(this).find(".price-by-reviewer").attr("data-new-price", newPrice);
        $(this).find(".price-by-reviewer span").text(newPrice);
       	    
    });
    
    $(".orders.view tr.product .price-by-reviewer").each(function(){
		totalPrice += parseFloat($(this).attr("data-new-price"));
    });

    $(".orders.view .new-price-by-reviewer .new-order-price").html(totalPrice.toFixed(2));
	
	/****************************************
	Order Add Page > Add Order Line
	****************************************/
	html.on("click", ".orders.add button.btn-add", function() {
		
		rowCount++;
		newRow = $(productTable).find("tr.product:last").clone();
		
		newRow.find("input").val("");
		newRow.find(".price, .questions").html("").removeClass("old-price").hide();
		newRow.find(".imei-check-wrap .imei-result").html("").removeClass("reported success");
		
		newRow.attr("data-product-row", rowCount);
		newRow.find(".autocomplete_products").attr("name", "products["+rowCount+"]");
		newRow.find(".price").attr("data-price-for", rowCount).attr("data-max-price", "").attr("data-min-price", "");
		newRow.find(".new-price").attr("data-price-for", rowCount).attr("data-new-price", "");
		newRow.find(".questions").attr("data-questions-for", rowCount);
		newRow.find(".Politiecheck").attr("data-imei-check-for", rowCount);
		newRow.find(".imei-check-wrap").hide();
		
		productTable.append(newRow);

		autocompleteProduct();
		
		return false;
		
	});
	
	/****************************************
	Order Add Page > Delete Order Line
	****************************************/
	html.on("click", ".orders.add button.btn-delete", function() {
		
		rowCount = $("tr.product").length;
		
		if(rowCount > 1){
		
			$(this).parent().parent().remove();
			
		}
		
		countTotalPrice();
		
		return false;
		
	});
	
	/****************************************
	Check IMEI
	****************************************/
	html.on("click", "span.imei-check", function() {
	    
	    //358054033523361
	    
	    var productRow = $(this).closest("tr.product");
	    var imeiNr = $(this).prev().val();
        var imeiURL = $(this).prev().data("imei-url");
		
		checkIMEI(imeiNr, imeiURL, productRow);

    });
    
	var countAnswers = $(".questions .main .question-answers").length;
	
    /****************************************
	Order Add Page > on input change
	****************************************/
	html.on("change", "tr.product .questions input[type=radio], tr.product .questions select, tr.product .questions input[type=checkbox]", function() {
    	
    	var answeredLength = $(".questions .main input.by-reviewer:radio:checked").length;
		
		var productRow = $(this).closest("tr.product");
			
		/* Functionality based on table */
		if ($("tr.product").parents('.table-add-products').length) {
			
			/* If Add */
			if($(this).parent().next(".subquestions").length){
				$(this).parent().next().show();
			} else {
				$(this).parent().parent().find(".subquestions").hide();
				$(this).parent().parent().find(".subquestions input").prop("checked", false);
			}
			
			/* Set price per orderline */
	        setNewProductPrice(productRow);
			
		} else {
			
			/* If Edit */
			/* TODO: Make dynamic */
			if(productRow.find(".answers-by-reviewer input[value=5]").is(":checked") || productRow.find(".question-id-3 .answers-by-reviewer input:radio:checked").length == 0){
	            productRow.find(".question-id-5 .answers-by-reviewer input").prop("checked", false);
	            productRow.find(".question-id-5 .answers-by-reviewer input").prop("disabled", true);
	        } else {
	            productRow.find(".question-id-5 .answers-by-reviewer input").prop("disabled", false);
	        }
	        
			/* Show total price if all radio buttons are checked */
	        if(answeredLength == countAnswers){
	        	$(".new-price-by-reviewer").show();
	        }
		
			/* Set price per orderline */
	        setNewProductPrice_Edit(productRow);
	        
		}
		
	});
	
	/****************************************
	Order Add Page > Add Questions
	****************************************/
	function addQuestions(product, productRowIndex){
		
		var currentRow = $("tr[data-product-row="+productRowIndex+"]");	
		currentRow.find(".max-price")
			.hide()
			.attr("data-price-for", productRowIndex)
			.attr("data-max-price", "")
			.attr("data-min-price", "")
			.removeClass("old")
			.show();
		currentRow.find(".new-price").html("");
		
		$.ajax({
            type: 'POST',
            url: '/admin/products/questions',
            data: {'product':product},
            dataType: 'json',

            //On succus call
            success: function (resp) {
	            
	            var string = "";
	            
	            $.each(resp, function (index, value) {
		            
                    string += getQuestionSpecs(value, productRowIndex);
		            
		        });
		        
		        currentRow.find(".questions").html(string).show();
		        
	            
	        }, error: function (jqXHR, exception) {
		     	console.log("Error");   
		    }
	        
	    });
	    
	    $.ajax({
            type: "POST",
            url: '/admin/products/get_product',
            data: {'product':product},
            dataType: 'json',

            //On succes call
            success: function (product) {
                //Count total price of order
                totalPrice = totalPrice + product.max_price;

                //Set price to HTML
                $(".max-price[data-price-for='"+productRowIndex+"']").removeClass("old-price");
                $(".max-price[data-price-for='"+productRowIndex+"']").html("<div>&euro; <span>" + product.max_price + "</div></span>");
				$(".max-price[data-price-for='"+productRowIndex+"']").attr("data-max-price", product.max_price);
				$(".max-price[data-price-for='"+productRowIndex+"']").attr("data-min-price", product.min_price);
				$(".new-price[data-price-for='"+productRowIndex+"']").attr("data-new-price", product.max_price);
				countTotalPrice();
            }
        });
        		
	}
	
	function setNewProductPrice(productRow){
		
		
		var normalPrice = productRow.find(".max-price").attr("data-max-price");
		var minimalPrice = productRow.find(".max-price").attr("data-min-price");
		var newPriceAttr = productRow.find(".new-price").attr("data-new-price");
		var productInfluenceSum = 0;
		var checkedLength = productRow.find(".questions input:checked").length;
		
		productRow.find(".max-price").addClass("old-price");
		productRow.find(".new-price").show();
		
		productRow.find(".questions input").each(function(){
						
			if($(this).is(':checked')){
				productInfluenceSum += parseFloat($(this).data("influence"));
			}
						
		});
		
		var newPrice = normalPrice - productInfluenceSum;
		if(normalPrice != newPrice){
			productRow.find(".max-price").addClass("old-price");
		} 
		
		if(newPrice < minimalPrice){
			newPrice = parseFloat(minimalPrice);
		}
		
		newPrice = newPrice.toFixed(2);
		
		productRow.find(".new-price").attr("data-new-price", newPrice);
		productRow.find(".new-price").html("<div>&euro; <span>" + newPrice + "</span></div>");
		
		countTotalPrice();
		
	}
	
	function setNewProductPrice_Edit(productRow){
		
		var allIndividualAnswered = false;
		var IndividualAnsweredLength = productRow.find(".questions .main input.by-reviewer:radio:checked").length;
		var countIndividualAnswers = productRow.find(".questions .main .question-answers").length;
        var price = productRow.find(".price-by-customer").attr("data-price");
        var normalPrice = productRow.find(".price-by-customer").attr("data-max-price");
        var minimalPrice = productRow.find(".price-by-customer").attr("data-min-price");
        var newPriceAttr = productRow.find(".price-by-reviewer").attr("data-new-price");
        var productInfluenceSum = 0;

		if(countIndividualAnswers == IndividualAnsweredLength){
			
			allIndividualAnswered = true;
			
			productRow.find(".questions input.by-reviewer").each(function(){
	        
	            if($(this).is(':checked')){
	                productInfluenceSum += parseFloat($(this).data("influence"));
	            }
	            
	        });
		}

        var newPrice = normalPrice - productInfluenceSum;

        if(newPrice < minimalPrice){
        	newPrice = parseFloat(minimalPrice);
        }

        newPrice = newPrice.toFixed(2);
		
		if(allIndividualAnswered == true){
		
	        if(newPrice != price){
		        productRow.find(".notification").show();
	        } else {
		        productRow.find(".notification").hide();
	        }
	
	        productRow.find(".price-by-reviewer").attr("data-new-price", newPrice).show();
	        productRow.find(".price-by-reviewer span").text(newPrice);
			
			countTotalPrice_Edit();
			
		}
        
    }
	
	function getQuestionSpecs(value, productRowIndex){
		var string = "";
		var inputType = "radio";
		
		var questionId = value.id;
		var questionName = value.name;
        var questionType = value.answer_type;
		var questionStyle = value.answer_style;
        var questionCustomCSS = value.custom_style;
        
        if(questionType == "multiple_choice"){
	        inputType = "checkbox";
        }
        
        string += "<div class='radio-toolbar-icon "+questionType+" "+questionStyle+" question-id-"+questionId+"'>";  
        string += '<div class="question-name">' +questionName+ '</div>';
        string += '<div class="question-answers">';
        
        var def = true;
        
        $.each(value.answers, function (key, answer) {
	        
        	string += '<div class="question-answer">';
        	 
        	string += '<input type="'+inputType+'" name="answer['+ productRowIndex + '][' + value.id + ']" value="' + answer.id + '" id="'+productRowIndex+'-'+answer.id+'" data-influence='+answer.price+'  class="required" /><label class="'+questionCustomCSS+'" for="'+productRowIndex+'-'+answer.id+'">' + answer.name + '</label>';
        				
			string += "</div>";            	
			
			if(typeof(answer.questions) != "undefined"){
			
				if(answer.questions.length > 0){
	            	
	            	string += "<div class='subquestions'>";
	            	
	            	$.each(answer.questions, function (subquestionkey, subquestion) {
	            		
	            		string += getQuestionSpecs(subquestion, productRowIndex);
	            		
	            	});
	            	
	            	string += "</div>";
	            
	        	}
			
			}
			
        });
        
        string += "</div>";
        
        string += "</div>";
        
        return string;
		
	}
	
    
	function countTotalPrice(){
		
		totalPrice = 0;
		
		$(".orders.add tr.product .new-price").each(function(){
			
			totalPrice += parseFloat($(this).attr("data-new-price"));
			
		});
		
		$(".orders.add .order-information").show();
		$(".orders.add .total-price span").html(parseFloat(totalPrice));
		
	}
	
	function countTotalPrice_Edit(){
		
        totalPrice = 0;

        $("tr.product .price-by-reviewer").each(function(){

            totalPrice += parseFloat($(this).attr("data-new-price"));
            
        });
		
        $(".new-order-price").html(totalPrice.toFixed(2));

    }
	
    html.on('click', 'form.search .checkbox-wrap .radio-toolbar-icon .multicheckbox input[type="checkbox"]', function(){
	   
	   checkCheckboxes();
	   
	});
	
	/****************************************
	Change Status for Select
	****************************************/
	html.on('change', 'select.change-status', function(){
        var data = {status: $(this).children(":selected").attr("data-statusId"), order: $(this).children(":selected").attr("data-orderId")};
        var orderStatus = $(this).children(":selected").attr("data-status");
        var changeStatusURL = $(this).data("url");
        
        $(".orders .order-status-title .loader").addClass("active").removeClass("changed");
        
        $.ajax({
            type: 'POST',
            url: changeStatusURL,
            data: data,
            dataType: 'json',
            success: function(result) {
                $(".currentStatus").replaceWith("<td class='currentStatus'>" + orderStatus + "<td/>");
                $(".orders .order-status-title .loader").removeClass("active");
                $(".orders .order-status-title .loader").addClass("changed");
                setTimeout(function(){
	                $(".orders .order-status-title .loader").removeClass("changed");
                }, 5000);
            }
        });
    });
    
    /****************************************
	Change Status for Button
	****************************************/
	html.on('click', 'button.change-status', function(){
        var orderStatus = $(this).attr("data-status");
        var changeStatusURL = $(this).data("url");
        var data = {status: $(this).attr("data-statusId"), order: $(this).attr("data-orderId")};
        
        $(".orders .order-status-title .loader").addClass("active").removeClass("changed");
        
        $.ajax({
            type: 'POST',
            url: changeStatusURL,
            data: data,
            dataType: 'json',
            success: function(result) {
                $(".currentStatus").replaceWith("<td class='currentStatus'>" + orderStatus + "<td/>");
                $(".orders .order-status-title .loader").removeClass("active");
                $(".orders .order-status-title .loader").addClass("changed");
                setTimeout(function(){
	                $(".orders .order-status-title .loader").removeClass("changed");
                }, 5000);
            }
        });
    });
	
	
	/****************************************
	Autocomplete Product
	****************************************/
	function autocompleteProduct(){
		$('.autocomplete_products').autocomplete({
            source: "/admin/products/search.json",
            scroll: true,
            max: 20,
            select: function (event, ui) {
	            var productRowIndex = $(this).closest("tr").attr("data-product-row");
				addQuestions(ui.item.value, productRowIndex);
				addIMEI(productRowIndex);
            }
        });
	}
     
	/****************************************
	Add IMEI
	****************************************/
    function addIMEI(productRowIndex){
	    
	   	var currentRow = $("tr[data-product-row="+productRowIndex+"]");
	   	currentRow.find(".imei-check-wrap").show();
	   	currentRow.find(".Politiecheck")
	   		.attr("data-imei-check-for", productRowIndex);
	   	
    }
    
	
	/****************************************
	Check IMEI
	****************************************/
    function checkIMEI(imeiNr, imeiURL, productRow){
	   	
	   	productRow.find(".imei-result").removeClass("reported").removeClass("success");
	   	productRow.find(".imei-check-wrap").addClass("inactive");
	   	
	    $.ajax({
            type: 'GET',
            url: imeiURL,
            data: {'imei':imeiNr},
            dataType: 'json',
            success: function(result) {
				
				productRow.find(".imei-check-wrap").removeClass("inactive");
				
				if(result.result.hasOwnProperty('number')){
					productRow.find(".imei-result").addClass("reported").text("Reported").show();
					
				} else {
					
					productRow.find(".imei-result").addClass("success").text("Not reported").show();
					
				}
				
            }
        });
    }
	
	/****************************************
	Filter Order Page
	****************************************/

    html.on('change', 'form.search .filters select, form.search .filters .multicheckbox input[type="checkbox"]', function () {
		$('form.search').submit();
    });

    html.on("click", ".admin.orders.index .pagination a", function() {

        $.ajax ({
            async: true,
            url: $(this).attr("href"),
            success: function(data){
                $("#page-wrapper").html($(data).find("#page-wrapper").html());
                checkCheckboxes();
            }
        });

        return false;

    });
    
    html.on("submit", ".admin.orders.index form.search", function() {

        var formData = $(this).serialize();
        $.ajax ({
            url: "?" + formData,
            success: function(data){
                $("#page-wrapper").html($(data).find("#page-wrapper").html());
                
                checkCheckboxes();
                
            }
        });

        return false;

    });
    
	function checkCheckboxes(){
		$('.multicheckbox input[type="checkbox"]').each(function(){
		   
			if($(this).is(':checked')){
				$(this).parent().addClass("checked");
			} else {
				$(this).parent().removeClass("checked");
			}
		
		});
	}
    
    //
    //
    // $("body").on("click", ".pagination a", function() {
    //
    //     var formData = $("form").serialize();
    //
    //     console.log(formData);
    //
    //     var url = "https://swoop.dev/admin/orders?";
    //     var newUrl = url + "&" + formData;
    //
    //     $.ajax ({
    //         async: true,
    //         url: newUrl,
    //         success: function(data){
    //             $(".wrap").html($(data).find(".wrap"));
    //         }
    //     });
    //
    //
    //     return false;
    //
    // });
    //
    // body.on('change', '.orders .search select', function () {
    //     //$(".pagination a").click();
    //     var url = $(this).val();
    //     //console.log(url);
    //     if (url) {
    //         //window.location = url;
    //     }
    //
    //
    //
    //     return false;
    // });

});
