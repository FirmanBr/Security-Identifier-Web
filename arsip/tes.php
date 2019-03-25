

<script>
$(function() {
            $("#frmWeightsMeasures").validate();
            $("#frmWeightsMeasures").submit(function(event) {
                var isvalidate = $("#frmWeightsMeasures").valid();

                if (isvalidate) {
                  
                    event.preventDefault();
                    var form = $(this);

                    $.ajax({
                        type: "POST",
                        cache: true,
                        url: form.attr("action"),
                        data: form.serialize(),
                        dataType: "json",
                        error: searchFailed,

                        success: function(weightsData) {
                            $("#DisplayConversion").html(weightsData.DisplayConversion);
                        }

                    });
                }
            });
        });

        function searchFailed(xhr, errorType, exception) {
            var errorMessage = exception || xhr.statusText;
            $("#DisplayConversion").
            /<script>
            