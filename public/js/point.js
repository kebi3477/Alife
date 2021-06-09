function changePoint(point) {
    const json = {};
    if(point < 100) {
        json.name = '그린';
        json.color = 'rgb(21, 112, 14)';
        json.width = `${point}%`;
        json.image = 'profile_g.svg';
    } else if(point < 200) {
        json.name = '옐로우그린';
        json.color = 'rgb(178, 219, 49)';
        json.width = `${point-100}%`;
        json.image = 'profile_yg.svg';
    } else if(point < 300) {
        json.name = '옐로우';
        json.color = 'rgb(247, 196, 1)';
        json.width = `${point-200}%`;
        json.image = 'profile_y.svg';
    } else if(point < 400) {
        json.name = '오렌지';
        json.color = 'rgb(247, 156, 1)';
        json.width = `${point-300}%`;
        json.image = 'profile_o.svg';
    }
    
    return json;
}

export default changePoint;