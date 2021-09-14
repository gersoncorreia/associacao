var xmlhttp = null;
// ConexÃ£o via XmlHttp
try {
    xmlhttp = new XMLHttpRequest();
} catch (ee) {
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
}

function mostraConteudo(url, div) {
    // Seleciona objeto
    obj_div = document.getElementById(div);
    // Verifica se existe xmlhttp
    if (xmlhttp) {
        if (xmlhttp.readyState != 1) {
            xmlhttp.open("GET", url, true);
            xmlhttp.onreadystatechange = function() {
                // Verifica estado da requisiÃ§Ã£o
                if (xmlhttp.readyState == 1) {
                    obj_div.innerHTML = "Aguarde ...";
                } else if (xmlhttp.readyState == 4) {
                    // Verifica status da requisiÃ§Ã£o
                    if (xmlhttp.status == 200) {
                        obj_div.innerHTML = xmlhttp.responseText;
                    } else {
                        obj_div.innerHTML = "Erro ao carregar ...";
                    }
                }
            }
        }
    }
    xmlhttp.send(null);
}