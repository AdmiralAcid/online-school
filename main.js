//window.onload = init;
addListener(window, 'load', initHead);

function initHead() {
	var dropdown = document.getElementById("menu-right-personified");
//	dropdown.addEventListener("click", handleDropdownClick, false);
	dropdown.onclick = handleDropdownClick;
}

function handleDropdownClick() {
	var actionList = document.getElementById("action-list");
	var arrow = document.getElementById("arrow-container");
	if (actionList.style.display == "none" || actionList.style.display == "") {
		actionList.style.display = "block";
		arrow.style.backgroundImage = "url(./images/arrow_down.png)";
	}
	else {
		actionList.style.display = "none";
		arrow.style.backgroundImage = "url(./images/arrow.png)";
	}
}

function addListener(obj, type, listener) {
  if (obj.addEventListener) {
    obj.addEventListener(type, listener, false);
    return true;
  } else if(obj.attachEvent) {
    obj.attachEvent('on' + type, listener);
    return true;
  }
  return false;
}