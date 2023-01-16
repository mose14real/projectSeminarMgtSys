const projectType = document.querySelector('.project-type');
// const projectTypeUser = document.querySelector('.project-type-user');
const groupDetails = document.querySelector('.group-details');
// const groupDetailsUser = document.querySelector('.group-details-user');


projectType.addEventListener('click', (event)=>{
    event.preventDefault();
    if(projectType.value == 'group')
    {
        groupDetails.classList.remove('d-none');
    }else if(projectType.value == 'individual'){
        groupDetails.classList.add('d-none');
    }
})

// projectTypeUser.addEventListener('click', (event)=>{
//     event.preventDefault();
//     if(projectTypeUser.value == 'group')
//     {
//         groupDetailsUser.classList.remove('d-none');
//     }else if(projectTypeUser.value == 'individual'){
//         groupDetailsUser.classList.add('d-none');
//     }
// })
