const url = "api/";

function RequestAPI(url, api, data, session = null) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("NE-API", api);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let json = JSON.parse(xhr.responseText);
            AnswerAPI(json, api);
        }
    };

    xhr.send(data);
}