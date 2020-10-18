var Auth = {};

Auth.isAuthenticated = () => {
    return !!localStorage.getItem('_tokken');
};

Auth.getTokken = () => {
    return localStorage.getItem('_tokken');
};

Auth.signout = () => {
    localStorage.clear();
}