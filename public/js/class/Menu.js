"use strict";

class Menu {

	constructor() {
		// Button
		this.ulContainerElt = document.querySelector("ul");
		
		// Container
		this.containerElt = document.querySelectorAll(".tab_menu");

		// Other
		this.enableMenu = false;
	}

	menuOpen() {
		// Check if ulContainerElt exist
		if(this.ulContainerElt) {

			// Check if ulContainerElt is click
			this.ulContainerElt.addEventListener("click", (evenement) =>{

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

					this.ulContainerElt.style.marginLeft = "0";
					this.ulContainerElt.style.width = "50%";
					this.enableMenu = true;
					
				}

				// Close the menu
				else if(this.enableMenu) {
					
					// Define a style for all elements in containerElt
					while(count < nbElement) {
						this.containerElt[count].style.display = "none";
						count++;
					}

					this.ulContainerElt.style.marginLeft = "40%";
					this.ulContainerElt.style.width = "10%";
					this.enableMenu = false;
				}
			}); // End evenement
		}
	}	// End menuOpen

	

}// End class Menu