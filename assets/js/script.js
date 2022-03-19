// DOM
const infosButtonElement = document.querySelector('.infosButton')
const formsButtonElement = document.querySelector('.formsButton')
const typesButtonElement = document.querySelector('.typesButton')
const statsButtonElement = document.querySelector('.statsButton')

const infosContentElement = document.querySelector('.infosContent')
const formsContentElement = document.querySelector('.formsContent')
const typesContentElement = document.querySelector('.typesContent')
const statsContentElement = document.querySelector('.statsContent')

// On click, change active content
infosButtonElement.addEventListener('click', () =>
{
    infosButtonElement.classList.add('buttonActive')
    formsButtonElement.classList.remove('buttonActive')
    typesButtonElement.classList.remove('buttonActive')
    statsButtonElement.classList.remove('buttonActive')

    infosContentElement.classList.add('contentActive')
    formsContentElement.classList.remove('contentActive')
    typesContentElement.classList.remove('contentActive')
    statsContentElement.classList.remove('contentActive')
})

formsButtonElement.addEventListener('click', () =>
{
    infosButtonElement.classList.remove('buttonActive')
    formsButtonElement.classList.add('buttonActive')
    typesButtonElement.classList.remove('buttonActive')
    statsButtonElement.classList.remove('buttonActive')

    infosContentElement.classList.remove('contentActive')
    formsContentElement.classList.add('contentActive')
    typesContentElement.classList.remove('contentActive')
    statsContentElement.classList.remove('contentActive')
})

typesButtonElement.addEventListener('click', () =>
{
    infosButtonElement.classList.remove('buttonActive')
    formsButtonElement.classList.remove('buttonActive')
    typesButtonElement.classList.add('buttonActive')
    statsButtonElement.classList.remove('buttonActive')

    infosContentElement.classList.remove('contentActive')
    formsContentElement.classList.remove('contentActive')
    typesContentElement.classList.add('contentActive')
    statsContentElement.classList.remove('contentActive')
})

statsButtonElement.addEventListener('click', () =>
{
    infosButtonElement.classList.remove('buttonActive')
    formsButtonElement.classList.remove('buttonActive')
    typesButtonElement.classList.remove('buttonActive')
    statsButtonElement.classList.add('buttonActive')

    infosContentElement.classList.remove('contentActive')
    formsContentElement.classList.remove('contentActive')
    typesContentElement.classList.remove('contentActive')
    statsContentElement.classList.add('contentActive')
})