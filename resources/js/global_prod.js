const url = window.location.href;
const prefix = url.slice(0, 5);
export const global = {
    apiUrl:
        prefix == "https"
            ? "https://pnrdassam.org/gaut/public/api/"
            : "http://pnrdassam.org/gaut/public/api/",
    imgUrl:
        prefix == "https"
            ? "https://pnrdassam.org/gaut/storage/app"
            : "http://pnrdassam.org/gaut/storage/app"
};
console.log(url, prefix, global);
