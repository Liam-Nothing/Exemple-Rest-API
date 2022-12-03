/* Api management */

function AnswerAPI(answer_json, api_name) {

    if (!getCookie("PHPSESSID")) {
        setCookie("PHPSESSID", answer_json["session"], 3);
    }

    if (answer_json["type"] == "success") {
        switch (api_name) {

            case "view_message_json":
                var time = new Date();
                time_text = time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
                console.log(answer_json);
                document.getElementById("console").innerHTML = "[" + time_text + "]" + JSON.stringify(answer_json) + "<br>" + document.getElementById("console").innerHTML;
                break;
    
            default:
                console.log(`Api rep doesn't exist. ${api_name}.`);
        }
    }else{
        console.log(answer_json["message"]);
    }
}

function getMessage() {
    let data = {};
    let api = "view_message_json";

    data["message-id-db"] = "1";

    RequestAPI(url, api, JSON.stringify(data), getCookie("PHPSESSID"));
}

/**********************************************************************************************/


/* Cookie management */
/* https://stackoverflow.com/questions/14573223/set-cookie-and-get-cookie-with-javascript#answer-24103596 */

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

/**********************************************************************************************/