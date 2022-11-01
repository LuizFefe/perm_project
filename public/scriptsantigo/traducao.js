const selectLanguage = document.querySelector("#selectLanguage");

$('.portugues').show();
$('.espanhol').hide();

document.addEventListener('change', () => {
    if (selectLanguage.value === 'pt') {
        $('.espanhol').hide();
        $('.portugues').show();

        console.log('Português')
    };
    if (selectLanguage.value === 'es') {
        $('.portugues').hide();
        $('.espanhol').show();
        console.log('Espanhol');
    };
    
    
});

// const paisOrigem = document.querySelector('#operador_pais');

// if (paisOrigem.value === 'Brasil') {
//     $('.portugues').show();
//     $('.espanhol').hide();
//     selectLanguage.value = 'pt';
//     console.log('Português')
// };
// if (paisOrigem.value != 'Brasil') {
//     $('.portugues').hide();
//     $('.espanhol').show();
//     selectLanguage.value = 'es';
//     console.log('Espanhol');

// };