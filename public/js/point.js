async function getPoint() {
    return await fetch('controller/user/getUserPoint')
    .then(point => point.text())
    .then(point => parseInt(point))
    .then(point => {
        const json = {};
        if(point < 100) {
            json.name = '그린';
            json.color = 'rgb(21, 112, 14)';
            json.width = `${point}%`;
            json.image = 'profile_g.svg';
            json.benefit = '0%';
        } else if(point < 200) {
            json.name = '옐로우그린';
            json.color = 'rgb(178, 219, 49)';
            json.width = `${point-100}%`;
            json.image = 'profile_yg.svg';
            json.benefit = '3%';
        } else if(point < 300) {
            json.name = '옐로우';
            json.color = 'rgb(247, 196, 1)';
            json.width = `${point-200}%`;
            json.image = 'profile_y.svg';
            json.benefit = '5%';
        } else if(point < 400) {
            json.name = '오렌지';
            json.color = 'rgb(247, 156, 1)';
            json.width = `${point-300}%`;
            json.image = 'profile_o.svg';
            json.benefit = '7%';
        }
        return json;
    })
}

export default getPoint;