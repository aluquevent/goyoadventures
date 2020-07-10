window.addEventListener("load",
    ()=>{
        let boton = document.querySelector("#dias");
        let padre = document.querySelector("#padre");
        let numero = 1;
        let boton_borrar = document.querySelector("#borrar_dias");
        boton.addEventListener("click",
            ()=>{
                if(numero<=8){
                    let nuevo_titulo = document.createElement("h2");
                    nuevo_titulo.innerHTML = "Día "+numero;
    
                    let label = document.createElement("label");
                    label.setAttribute("for","imagen_dia"+numero);
                    label.innerHTML="Seleccionar imagen de vista previa para día "+numero;
    
                    let form_grupo_imagen = document.createElement("div");
                    form_grupo_imagen.classList.add("form-group");
    
                    let imagen_grupo = document.createElement("div");
                    imagen_grupo.classList.add("custom-file");
    
                    let imagen_input = document.createElement("input");
                    imagen_input.setAttribute("type", "file");
                    imagen_input.classList.add("custom-file-input");
                    imagen_input.setAttribute("name","imagen_dia"+numero);
                    imagen_input.setAttribute("id","imagen_dia"+numero);
    
                    let label_imagen = document.createElement("label");
                    label_imagen.setAttribute("for","imagen_dia"+numero);
                    label_imagen.classList.add("custom-file-label");
                    label_imagen.innerHTML="Seleccionar imagen";
    
                    let form_grupo_desc = document.createElement("div");
                    form_grupo_desc.classList.add("form-group");
    
                    let label_desc = document.createElement("label");
                    label_desc.setAttribute("for","descripcion"+numero);
                    label_desc.innerHTML = "Descripción para día "+numero; 
    
                    let descripcion = document.createElement("textarea");
                    descripcion.classList.add("form-control");
                    descripcion.setAttribute("id","descripcion"+numero);
                    descripcion.setAttribute("name","descripcion"+numero);        
    
                    imagen_grupo.appendChild(imagen_input);
                    imagen_grupo.appendChild(label_imagen);
                    form_grupo_desc.appendChild(label_desc);
                    form_grupo_desc.appendChild(descripcion);
                    form_grupo_imagen.appendChild(nuevo_titulo);
                    form_grupo_imagen.appendChild(label);
                    form_grupo_imagen.appendChild(imagen_grupo);
    
                    padre.appendChild(form_grupo_imagen);
                    padre.appendChild(form_grupo_desc);
    
                    numero++;
                }else{
                    alert("Máximo 8 días");
                }               

            })
        boton_borrar.addEventListener("click",
            ()=>{
                padre.lastChild.remove();
                padre.lastChild.remove();
                numero = numero - 1;
            })
    })

    