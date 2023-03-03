(function() {
    function getUrlWithoutDomain(url) {
        return url.replace(/^.*\/\/[^\/]+/, '');
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return null;
    }

    function setCookie(cname, cvalue, exdays) {		
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";path=/";
    }

    function getSessionStorage(sname) {
		if(window.sessionStorage)
		{
        return window.sessionStorage.getItem(sname);
		}
		else{
			return null;
		}
    }

    function setSessionStorage(sname, svalue) {
        if(window.sessionStorage)
		{
			window.sessionStorage.setItem(sname, svalue);
		}
    }

    function guid() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        }).toUpperCase();
    }

    var cookieName = "_bizweb_s";
    var sessionStorageData = getSessionStorage(cookieName);
    var cookieData = getCookie(cookieName);

    var cookieValue = cookieData || sessionStorageData || guid();
	
    if (!cookieData) {
        setCookie(cookieName, cookieValue, 1);
    }

    if (!sessionStorageData) {
        setSessionStorage(cookieName, cookieValue);
    }
	
    if (!cookieData || (window.sessionStorage &&!sessionStorageData)) {

        var req = "/visit/record.gif?p=" + encodeURIComponent(getUrlWithoutDomain(window.location.href)) + "&r=" + encodeURIComponent(document.referrer) + "&s=" + cookieValue;

        new Image().src = req;
    }	
}());