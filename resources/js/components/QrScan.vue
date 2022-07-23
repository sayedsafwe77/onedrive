<template>
    <div class="qr-container" v-if="enable_scan">
        <span><i class="fa-solid fa-xmark"></i></span>
        <qrcode-stream @decode="onDecode"></qrcode-stream>
        <p class="error-qr">project id is wrong please try again</p>
    </div>
</template>
<script>
 export default {
    props:{
        projects:{
            required:true,
            type:String
        }
    },
    data(){
        return {
            enable_scan: false,
            drive_projects: [],
            clicked_id: null,
        }
    },
    mounted(){
        this.projectsEvent();
    },
    methods:{
        onDecode(decodedString) {
            //projects/user
            if(decodedString == this.clicked_id){
                this.enable_scan = false;
                window.location.href = window.location.origin + '/projects/selectAction/' + this.clicked_id;
            }else{
                document.querySelector('.error-qr').classList.add('show-error');
                setTimeout(() => {
                    document.querySelector('.error-qr').classList.remove('show-error');
                }, 2000);
            }
        },
        projectsEvent(){
            document.querySelectorAll('.project_button')
            .forEach(project => project.addEventListener('click',this.enableScan))
        },
        enableScan(e){
            this.enable_scan = true;
            setTimeout(() => {
                document.querySelector('.fa-xmark').addEventListener('click',this.disapleScan)
            }, 100);
           this.clicked_id = e.target.id;
        },
        disapleScan(){
            this.enable_scan = false;
        }
    }
 }
</script>
