const url = "api/";

function RequestAPI(url, api, data, session = null) {
    let xhr = new XMLHttpRequest();

    xhr.open("POST", url+"?NE-API="+api+"&NE-SESSION-ID="+session, true);

    /* OVH cloud server don't accept custom headers, so we use GET to pass API and SESSION ID */
    // xhr.open("POST", url, true);
    // xhr.setRequestHeader("NE-API", api);
    // xhr.setRequestHeader("NE-SESSION-ID", session);

    /* Disable content-type if send data like files */
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let json = JSON.parse(this.responseText);
            AnswerAPI(json, api);
        }
    };

    xhr.send(data);
}