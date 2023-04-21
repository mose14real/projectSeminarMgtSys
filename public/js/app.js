const projectType = document.querySelector('.project-type');
const groupDetails = document.querySelector('.group-details');

projectType.addEventListener('click', (event)=>{
    event.preventDefault();
    if(projectType.value == 'group')
    {
        groupDetails.classList.remove('d-none');
    }else if(projectType.value == 'individual'){
        groupDetails.classList.add('d-none');
    }
})
