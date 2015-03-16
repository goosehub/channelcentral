var xmlhttp = new XMLHttpRequest();
var url = 'http://gdata.youtube.com/feeds/api/videos?v=2&alt=jsonc&q=TJC-subagTg';

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var response = JSON.parse(xmlhttp.responseText);
        console.log(response.data.items[0].accessControl);
        console.log(response.data.items[0].restrictions);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

        console.log('haha');
