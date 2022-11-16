/* Api management */
function AnswerAPI(answer_json, api_name) {
    if (answer_json["type"] == "success") {
        switch (api_name) {
    
            case "view_message_json":
                console.log(answer_json);
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

    RequestAPI(url, api, JSON.stringify(data));
}