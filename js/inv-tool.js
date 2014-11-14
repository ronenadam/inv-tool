function validateForm() {
            var nameOk = false;
            var priceOk = false;
            var colorOk = false;
            var conditionOk = false;
            
            var name = $("form").find("input[name='name']").val().trim();
            var price = $("form").find("input[name='price']").val().trim();
            var color = $("form").find("input[name='color']").val().trim();
            var condition = $("form").find("select[name='condition']").val();
            
            // Set the form fields just in case white space needed to be trimmed.
            $("form").find("input[name='name']").val(name);
            $("form").find("input[name='price']").val(price);
            $("form").find("input[name='color']").val(color);
           
            // name
            if (name === "") {
               $("#name_msg").html("Name cannot be left blank");
            } else {
               $("#name_msg").html("");
               nameOk = true;
            }
            
            // price
            if (price === "") {
               $("#price_msg").html("Price cannot be left blank");
            } else if (isNaN(price)) {
               $("#price_msg").html("Price must be a number");
            } else {
               $("#price_msg").html("");
               priceOk = true;
            }
           
            // color
            if (color === "") {
               $("#color_msg").html("Color cannot be left blank");
            } else {
               $("#color_msg").html("");
               colorOk = true;
            }
            
            // condition
            if (condition === "") {
               $("#condition_msg").html("Condition cannot be left blank");
            } else {
               $("#condition_msg").html("");
               conditionOk = true;
            }
            
            if (nameOk === true && priceOk === true && colorOk === true && conditionOk === true) {
               return true;
            }
            
            return false;
         }
         
         $("form").submit(function(e) {
            if (validateForm()) {
               return;
            }
            
            e.preventDefault();
         });