if (window.SimpleAnime) {
  new SimpleAnime();
}

new Glide('.glide', {
    type: 'slider',
    perView: 1,
    bound: true
}).mount();

new Glide('.glide2', {
    type: 'slider',
    bound: true,
    autoplay: 4000,
    hoverpause: true,
    gap: 20,
    perView: 2,
    breakpoints: {
        767: {
            perView: 1
        }
    }
}).mount();

new SimpleForm({
  form: ".formphp", // seletor do formulário
  button: "#enviar", // seletor do botão
  erro: "<div id='form-erro'><h2>Erro!</h2><p>Um erro ocorreu, tente enviar diretamente para consulta@cardiologiabrasilia.com.</p><h2>Error!</h2><p>An error ocurred, try sending directly to consulta@cardiologiabrasilia.com.</p></div>", // mensagem de erro
  sucesso: "<div id='form-sucesso'><h2>Mensagem enviada.</h2><h2>Message sent.</h2></div>", // mensagem de sucesso
});
