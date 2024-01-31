<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>


body {
    font-family: Arial, sans-serif;
    background-color: #463a4a;
    padding: 50px;
    margin: auto;
}

#registration-form{
    max-width:180px;
    margin: auto;
    padding-bottom: 20px;
    background-color: #963a3a;
}



        .error-message {
            color: red;
            text-align: center;
            
        }

        .success-message {
            color: green;
            text-align: center;
        }
 


    </style>
    <title>Registration Form</title>
</head>
<body>
    <div id="error-message" class="error-message"></div>
    <form id="registration-form">
        <label for="fullName">ФИО пользователя:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="address">Адрес:</label>
        <input type="text" id="address" name="address" required>

        <label for="apartment">Квартира:</label>
        <input type="text" id="apartment" name="apartment" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Повтор пароля:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <button type="button" onclick="validateForm()">Отправить</button>
    </form>

    <script>
       
function validateForm() {
   
    var fullName = document.getElementById("fullName").value;
    var address = document.getElementById("address").value;
    var apartment = document.getElementById("apartment").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

   
    var errorMessageElement = document.getElementById("error-message");

   
    if (!fullName || !address || !apartment || !email || !password || !confirmPassword) {
        errorMessageElement.innerHTML = "Пожалуйста, заполните все поля.";
        errorMessageElement.className = "error-message";
        return;
    }

    
    if (password !== confirmPassword) {
        errorMessageElement.innerHTML = "Пароли не совпадают.";
        errorMessageElement.className = "error-message";
        return;
    }

 
    errorMessageElement.innerHTML = "";
    errorMessageElement.className = "";

    // Отправка данных на сервер методом POST через AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "content.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    
    var data = "fullName=" + encodeURIComponent(fullName) +
               "&address=" + encodeURIComponent(address) +
               "&apartment=" + encodeURIComponent(apartment) +
               "&email=" + encodeURIComponent(email) +
               "&password=" + encodeURIComponent(password);

  
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                
                var response = JSON.parse(xhr.responseText);

                if (response.success) {
                    errorMessageElement.innerHTML = "Данные успешно отправлены.";
                    errorMessageElement.className = "success-message";
                } else {
                    errorMessageElement.innerHTML = "Ошибка на сервере: " + response.message;
                    errorMessageElement.className = "error-message";
                }
            } else {
                errorMessageElement.innerHTML = "Ошибка при отправке данных на сервер.";
                errorMessageElement.className = "error-message";
            }
        }
    };

    xhr.send(data);
}

    </script>
</body>
</html>
