$(document).ready(function () {

    updateGuthaben();

    $("button[type='field']").click(function () {



        // Daten an Server senden
        $.ajax({
            // pfad zur PHP Datei (ab HTML Datei)
            url: "play.php",
            // Daten, die an Server gesendet werden soll in JSON Notation
            data: {
                id: this.id,
            },
            datatype: "json",
            // Methode POST oder GET
            type: "POST",
            // Callback-Funktion, die nach der Antwort des Servers ausgefuehrt wird
            success: function (data) {
                clickJStoPHPResponse(data);
            }
        });


        function clickJStoPHPResponse(data) {
            // Antwort des Server ggf. verarbeiten
            var response = $.parseJSON(data);
            var nummer = response.nr;
            var id = response.id;

            if (response.nr == 1) {
                $("#" + id + "").css("background-color", "red");
            } else {
                $("#" + id + "").css("background-color", "green");
            }
            updateGuthaben();

            $("button[type='field']").attr("disabled", "disabled");
        }


    });

    $("#go").click(function () {
        var money = $("#money").val();
        var mines = $("#mines").val();

        // Daten an Server senden
        $.ajax({
            // pfad zur PHP Datei (ab HTML Datei)
            url: "go.php",
            // Daten, die an Server gesendet werden soll in JSON Notation
            data: {
                money: money,
                mines: mines
            },
            datatype: "json",
            // Methode POST oder GET
            type: "POST",
            // Callback-Funktion, die nach der Antwort des Servers ausgefuehrt wird
            success: function (data) {
                if (data == "false") {
                    alert("Du hast zu wenig Geld auf deinem Konto!");
                } else {
                    $("button[type='field']").css("background-color", "white");
                    $("button[type='field']").removeAttr("disabled");
                }

            }
        });



    });



    function updateGuthaben() {
        $.get("money.php", function (data) {
            $("#guthaben").html(data); 
        });
    }


});