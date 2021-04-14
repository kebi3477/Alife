const logout = document.querySelector('.logout');

logout && logout.addEventListener('click', function() {
    fetch('controller/user/logout')
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('로그아웃 되었습니다!');
            location.reload();
        }
    })
})