class Loading {
    constructor() {
        this.dom = document.createElement('div');
        this.init();
    }
    init() {
        this.dom.classList.add('loading');
        this.dom.innerHTML = '<div class="loading__circle"></div>';
        document.querySelector('body').before(this.dom);
        this.loading = document.querySelector('.loading');
    }
    start() {
        this.loading.style.display = 'flex';
    }
    end() {
        this.loading.style.display = 'none';
    }
}
const loading = new Loading();
export default loading;