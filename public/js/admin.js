fetch('controller/user/getAllUsers')
.then(users => users.json())
.then(users => {
    const usersDom = document.querySelector('.users');
    users.forEach(user => {
        const usersRow = document.createElement('div');
        const rank = +user.user_rank === 1 ? '관리자' : +user.user_rank === 99 ? '슈퍼 관리자' : '일반';
        usersRow.classList.add('users__row');
        usersRow.innerHTML = `
            <div>${user.user_email}</div>
            <div>${user.user_name}</div>
            <div>${user.user_phone}</div>
            <div>${user.user_address}</div>
            <div>${rank}</div>
            <div>${user.user_point}</div>
            <div><button>삭제</button></div>
        `;
        usersDom.append(usersRow);
    })
})