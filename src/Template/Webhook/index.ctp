<script>
    app.get('/webhook', function(req, res) {
        if (req.query['hub.mode'] === 'subscribe' &&
            req.query['hub.verify_token'] === "VeRRr311SY3nOh3hq2hR") {
            console.log("Validating webhook");
            res.status(200).send(req.query['hub.challenge']);
        } else {
            console.error("Failed validation. Make sure the validation tokens match.");
            res.sendStatus(403);
        }
    });
</script>