"use strict";

class Menu {

	constructor() {
		// Button
		this.menuButtonElt = document.getElementById("button_menu");
		
		// Container
		this.containerElt = document.querySelectorAll(".tab_menu");

		// Other
		this.enableMenu = false;
	}

	menuOpen() {
		// Check if menuButtonElt exist
		if(this.menuButtonElt) {

			// Check if menuButtonElt is click
			this.menuButtonElt.addEventListener("click", (evenement) =>{

				// Define variables
				let nbElement = this.containerElt.length;
				let count = 0;

				// Open the menu
				if(!this.enableMenu) {

					// Define a style for all elements in containerElt
					while(count < nbElement) {
						this.containerElt[count].style.display = "block";
						count++;
					}
					this.enableMenu = true;
				}

				// Close the menu
				else if(this.enableMenu) {

					// Define a style for all elements in containerElt
					while(count < nbElement) {
						this.containerElt[count].style.display = "none";
						count++;
					}
					this.enableMenu = false;
				}

			});
		}
	}	// End nameFunction 

}// End class Menu