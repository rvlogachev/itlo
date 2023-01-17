/**
 * Created by rlogachev on 07.10.21.
 */
console.log("Hello world bundle/etherium.js");

const ethereumButton = document.querySelector('.enableEthereumButton');
const showAccount = document.querySelector('.showAccount');
const showAccountLabel = document.querySelector('.showAccountLabel');
const enableEthereumButton = document.querySelector('.enableEthereumButton');

ethereumButton.addEventListener('click', () => {
    getAccount();
});

async function getAccount() {
    const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
    const account = accounts[0];
    showAccountLabel.style.display = "block";
  enableEthereumButton.style.display = "none";
    //showAccount.innerHTML = account ;
     showAccount.innerHTML = account.substr(0, 2)+"..."+account.substr(37, 5);
}
