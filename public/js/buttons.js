$( document ).ready(function() {
    let cardBlock = $('#cardBlock');
    let counter = 1;

    if (!localStorage.getItem('postNum')) {
        localStorage.setItem('postNum', 1);
    }
    cardBlock.on('click', (event) =>{

        if (event.target.dataset.btn == 'getdata') {

            if (counter > 10) {
                return;
            }

            let postNum = localStorage.getItem('postNum');

            $.get( `http://jsonplaceholder.typicode.com/posts/${postNum}`, function( data ) {
                let baseCard = $('#baseCard')[0].firstElementChild.cloneNode(true);

                baseCard.dataset.btnid = event.target.dataset.btnid;
                baseCard.firstElementChild.firstElementChild.innerText = data.title;
                baseCard.firstElementChild.lastElementChild.firstElementChild.innerText = data.body;

                cardBlock[0].childNodes[5].append(baseCard);

                localStorage.setItem('postNum', ++postNum);
            });

            counter++;
        }

        if (event.target.dataset.btn == 'save') {
            let collection = cardBlock[0].childNodes[5].children;
            let jsonToSave = {};

            for (let i = 0; i < collection.length; i++) {
                jsonToSave[i] = {
                    btnId: collection[i].dataset.btnid,
                    title: collection[i].firstElementChild.firstElementChild.innerText,
                    body: collection[i].firstElementChild.lastElementChild.firstElementChild.innerText
                };
            }
            $.post("/content/create", jsonToSave)
                .done(function (data) {
                    console.log(data);
                });
            cardBlock[0].childNodes[5].innerHTML = '';
        }

    });
});
