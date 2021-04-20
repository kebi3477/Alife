class Loading {
    constructor() {
        this.loading = document.querySelector('.loading');
    }
    start() {
        this.loading.style.display = 'flex';
    }
    end() {
        this.loading.style.display = 'none';
    }
}

export default Loading;