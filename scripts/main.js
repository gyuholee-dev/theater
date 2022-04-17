// main.js




// 페이지 로드 후 실행
document.addEventListener("DOMContentLoaded", async function(){
    
    // 로그 출력
    let msg = await xhr('getMsg');
    let logs = '';
    for (type in msg) {
        let log = msg[type];
        if (log) {
            logs += `<div class="log ${type}">${log}</div>`;
        }
    }
    logs = `<div id="message">${logs}</div>`;
    $(logs).prependTo('body');

});