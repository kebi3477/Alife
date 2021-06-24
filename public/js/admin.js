import appendRecipeList from './view.js';

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
        usersRow.querySelector('button').onclick = () => removeUser(user.user_email);
        usersDom.append(usersRow);
    })
})

fetch('controller/recipe/getRecipeByType')
.then(recipes => recipes.json())
.then(recipes => {
    appendRecipeList(recipes, 'recipe__list');
})

fetch('/controller/user/getReports')
.then(reports => reports.json())
.then(reports => {
    const reportDom = document.querySelector('.report');
    reports.forEach(report => {
        const reportRow = document.createElement('div');
        reportRow.classList.add('report__row');
        reportRow.innerHTML = `
            <div>${report.collection_title}</div>
            <div>${report.report_user}</div>
            <div>${report.user_name}</div>
            <div>${report.report_content}</div>
        `;
        reportDom.append(reportRow);
    })
})

function removeUser(email) {
    if(confirm('정말 삭제하시겠습니까?')) {
        fetch('controller/user/removeUser', {
            method: 'POST',
            body: email
        })
        .then(msg => msg.json())
        .then(msg => {
            if(msg.status === 'A200') {
                alert('삭제 되었습니다.');
                location.reload();
            } else {
                alert('에러!');
            }
        })
    }
}