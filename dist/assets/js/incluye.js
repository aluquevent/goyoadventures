window.addEventListener("load",
    ()=>{
        let boton_incluye = document.querySelector("#incluye");
        let padre_incluye = document.querySelector("#padre_includes");
        let numero = 1;
        let boton_borrar_incluye = document.querySelector("#borrar_incluye");
        boton_incluye.addEventListener("click",
            ()=>{
                if(numero<=10){                  
    
                    let form_grupo_incluye = document.createElement("div");
                    form_grupo_incluye.classList.add("form-group");
    
                    let incluye_input = document.createElement("input");
                    incluye_input.setAttribute("type", "text");
                    incluye_input.classList.add("form-control");
                    incluye_input.setAttribute("name","incluye"+numero);
                    incluye_input.setAttribute("id","incluye"+numero);
    
                    let label_incluye = document.createElement("label");
                    label_incluye.setAttribute("for","incluye"+numero);
                    label_incluye.innerHTML="Incluído nº"+numero;
                    
                    let form_grupo_incluye_en = document.createElement("div");
                    form_grupo_incluye_en.classList.add("form-group");
    
                    let incluye_en_input = document.createElement("input");
                    incluye_en_input.setAttribute("type", "text");
                    incluye_en_input.classList.add("form-control");
                    incluye_en_input.setAttribute("name","incluye_en"+numero);
                    incluye_en_input.setAttribute("id","incluye_en"+numero);
    
                    let label_incluye_en = document.createElement("label");
                    label_incluye_en.setAttribute("for","incluye_en"+numero);
                    label_incluye_en.innerHTML="Incluído en inglés nº"+numero;
    
                    form_grupo_incluye.appendChild(label_incluye);
                    form_grupo_incluye.appendChild(incluye_input);                   
                    form_grupo_incluye_en.appendChild(label_incluye_en);
                    form_grupo_incluye_en.appendChild(incluye_en_input);                   
    
                    padre_incluye.appendChild(form_grupo_incluye);               
                    padre_incluye.appendChild(form_grupo_incluye_en);               
    
                    numero++;
                }else{
                    alert("Máximo 10 incluídos");
                }               

            })
        boton_borrar_incluye.addEventListener("click",
            ()=>{
                padre_incluye.lastChild.remove();
                padre_incluye.lastChild.remove();
                
                numero = numero - 1;
            })
    })