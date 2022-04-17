// console.log('IMPORT FUNCTIONS');

// Promise XMLHttpRequest
async function requestData(file, param = null) {
    let requestUrl = file;
    if (param !== null) {
        let i = 0;
        for (let key in param) {
            if (i === 0) {
                requestUrl += '?' + key + '=' + param[key];
            } else {
                requestUrl += '&' + key + '=' + param[key];
            }
            i++;
        }
    }

    try {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', requestUrl);
        xhr.send();
        const request = await new Promise((resolve, reject) => {
            xhr.onload = function () {
                if (xhr.status == 200) {
                    resolve(xhr.response);
                } else {
                    reject(Error(xhr.statusText));
                }
            };
        });
        return request;
    } catch (error) {
        throw Error(error);
    }
}
// XHR Excute PHP function
async function xhr(func, param=null) {
    if (param === null) {
        param = {};
    }
    if (param['call'] === undefined) {
        param['call'] = func;
    }
    let result = await requestData('xhr.php', param);
    if (result) {
        return JSON.parse(result);
    }
}
