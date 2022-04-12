function RequestAPI(url, data){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let json = JSON.parse(xhr.responseText);
            console.log(json);
        }
    };
    xhr.send(data);
}

function getMessage(){
    let api = "view_message_json";
    let message = "This a test.";

    let data = JSON.stringify({"api": api, "message": message});
    let url = "http://localhost/Empty-Exemple-Rest-API/";

    RequestAPI(url, data);
}