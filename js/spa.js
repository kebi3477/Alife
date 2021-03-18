const h2 = document.querySelector("h2");
window.onload = () => {
    const lis = document.querySelectorAll("li");
    lis.forEach(el => {
        el.addEventListener("click", function(e) {
            const pathName = e.target.getAttribute("route");
            historyRouterPush(pathName, h2);
        })
    })
}
window.onpopstate = () => renderHTML(h2, window.location.pathname);

const historyRouterPush = (path, el) => {
    window.history.pushState({}, path, window.location.origin + path);
    renderHTML(el, path);
}

const renderHTML = (el, route) => {
    el.innerHTML = route;
}