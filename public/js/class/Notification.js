"use strict";

class Notification {

	constructor() {
		// Button
		this.notificationButtonElt = document.getElementById("button_notification");
		
		// Container
		this.containerElt = document.getElementById("container_notification");
	}

	notificationOpen() {
		// Check if containerElt exist
		if(this.containerElt) {

			// Check if notificationContainerElt is click
			this.notificationButtonElt.addEventListener("click", (evenement) =>{

				this.containerElt.style.display="none";
			}); // End evenement
		}
	}	// End notificationOpen

	

}// End class Notification