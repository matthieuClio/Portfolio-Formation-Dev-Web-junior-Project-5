"use strict";

class Email {

	constructor() {
		// Button
		this.notificationButtonElt = document.getElementById("button_notification");

		// Container
		this.formDataElt = document.getElementById('my_form');
		this.containerElt = document.getElementById("container_notification");
	}

	sendEmail() {

		// Check if formData exist
		if(this.formDataElt) {
	

			// Action when we validate the form
			this.formDataElt.addEventListener('submit', (evenement) =>{

				// Call a php file
				//...

				evenement.preventDefault();

				const formDataElt = new FormData(this.formDataElt);

				fetch('email', {
					method: 'post',
					body: formDataElt
				}).then(function(response){
					return response.text();

				}).then(function (text) {
					console.log(text);

				}).catch(function (error) {
					console.error(error);
				})


				// Open a notification
				//...

				// Check if containerElt exist
				
					this.containerElt.style.display = "block";
				
			})
		}
	}	// End sendEmail


	notificationOpen() {

		// Check if containerElt exist
		if(this.containerElt) {

			// Check if notificationContainerElt is click
			this.notificationButtonElt.addEventListener("click", (evenement) =>{

				this.containerElt.style.display = "block";
			}); // End evenement
		}
	}	// End notificationOpen

	notificationClosed() {

		// Close a notification
		//...

		// Check if containerElt exist
		if(this.containerElt) {

			// Check if notificationContainerElt is click
			this.notificationButtonElt.addEventListener("click", (evenement) =>{

				this.containerElt.style.display = "none";
			}); // End evenement
		}
	}	// End notificationClosed

} // End email