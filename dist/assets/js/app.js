window.addEventListener("load",
	()=>{
		let goyo_text = document.querySelector("#goyo");
		let goyo_img = document.querySelector("#goyo-img");
		let esmeralda_text = document.querySelector("#esmeralda");
		let esmeralda_img = document.querySelector("#esmeralda-img");

		esmeralda_img.addEventListener("click",
			()=>{
				goyo_text.classList.add("d-none");
				esmeralda_text.classList.remove("d-none");
			})
		goyo_img.addEventListener("click",
			()=>{
				esmeralda_text.classList.add("d-none");
				goyo_text.classList.remove("d-none");
			})
	})