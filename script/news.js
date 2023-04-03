let title = document.querySelector('.actu-title');
let content = document.querySelector('.actu-content');
let dayActu = document.querySelector('#actu-day');
let timeActu = document.querySelector('#actu-time');

async function initNews(newsId) {

    await fetch("../controllers/controller_news.php?id="+newsId, {
    })
    .then((response) => response.json())
    .then((result) => {
        let news = result;
        let date = new Date(news.date);
        let day = date.getDate();
        let month = date.toLocaleString('default', {month: "long"});
        let hours = date.getHours();
        let mins = date.getMinutes();
        title.innerHTML = news.title;
        content.innerHTML = news.content;
        dayActu.innerHTML = day + " " + month;
        timeActu.innerHTML = hours + 'h' + mins;
    });
}