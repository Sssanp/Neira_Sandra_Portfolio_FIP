(() => {
    const form = document.querySelector("#contactForm");
    const feedBack = document.querySelector("#feedback");


    //it tooks me all the day to connect the form to the database
    function regForm(event) {
        event.preventDefault();
        const url = "http://localhost:8888/snprw/adduser.php";
        const thisform = event.currentTarget;

        const formdata =
            "fname=" + thisform.elements.fname.value +
            "&lname=" + thisform.elements.lname.value +
            "&email=" + thisform.elements.email.value +
            "&city=" + thisform.elements.city.value +
            "&message=" + thisform.elements.message.value;
        console.log(formdata);
        console.log("loadedsuccesfully");

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: formdata
        })
            .then(response => response.json())
            .then(responseText => {
                console.log(responseText);
                feedBack.innerHTML = "";

                if (responseText.errors) {
                    responseText.errors.forEach(error => {
                        const errorElement = document.createElement("p");
                        errorElement.textContent = error;
                        feedBack.appendChild(errorElement);
                    })
                } else {
                    form.reset();
                    const messageElement = document.createElement("p");
                    messageElement.textContent = responseText.message;
                    feedBack.appendChild(messageElement);
                }
            })
            .catch(error => {
                console.log(error);
                feedBack.innerHTML = "";
                const messageElement = document.createElement("p");
                messageElement.textContent = "Sorry, an error occurred. Please try again later.";
                feedBack.appendChild(messageElement);
            })
    }

    form.addEventListener("submit", regForm);;

})();