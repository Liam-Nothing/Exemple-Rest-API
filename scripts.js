const url = "http://localhost/Empty-Exemple-Rest-API/";

function RequestAPI(url, data) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let json = JSON.parse(xhr.responseText);
            switch (JSON.parse(data)["api"]) {
                case "view_message_json":
                    console.log(json);
                    break;

                default:
                    console.log(`Api rep doesn't exist. ${JSON.parse(data)["api"]}.`);
            }
        }
    };
    xhr.send(data);
}

function getMessage() {
    let data = {};
    data["api"] = "view_message_json";
    data["message"] = "Your message";

    RequestAPI(url, JSON.stringify(data));
}