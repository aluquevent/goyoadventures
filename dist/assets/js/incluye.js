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
    
                    form_grupo_incluye.appendChild(label_incluye);
                    form_grupo_incluye.appendChild(incluye_input);                   
    
                    padre_incluye.appendChild(form_grupo_incluye);               
    
                    numero++;
                }else{
                    alert("Máximo 10 incluídos");
                }               

            })
        boton_borrar_incluye.addEventListener("click",
            ()=>{
                padre_incluye.lastChild.remove();
                
                numero = numero - 1;
            })
    })