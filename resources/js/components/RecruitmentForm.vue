<template id="">
  <div class="">
    <step-component :step="step" :barWidth="barWidth"></step-component>
    <component :is="component"></component>
  </div>

</template>
<script>
  import Nprogress from "nprogress";
  import "nprogress/nprogress.css";
  import PersonalInformation from './PersonalInformation.vue';
  import EducationalQualification from './EducationalQualification.vue';
  import DocumentUpload from './DocumentUpload.vue';
  import LanguageProficiency from './LanguageProficiency.vue';
  import ComputerKnowledge from './ComputerKnowledge.vue';
  import WorkExperience from './WorkExperience.vue';
  import Finish from './Finish.vue';
  export default{
    components:{
      PersonalInformation, DocumentUpload, LanguageProficiency, ComputerKnowledge, EducationalQualification,
      WorkExperience, Finish
    },
    data(){
      return{
        // step:this.$store.state.user.step,
        // barWidth:14.28
        // barWidth:0,
        // component:''
      }
    },
    updated(){
      console.log('updated');
    },
    beforeUpdate(){
      console.log('bupdated');
    },
    created(){

    },
    computed:{
      component(){
        if(this.$store.state.user.step==1){
          return 'PersonalInformation'
          // this.step=this.$store.state.user.step
        }
        if(this.$store.state.user.step==2){

          return 'EducationalQualification'
        }
        if(this.$store.state.user.step==3){

          return 'LanguageProficiency'
        }
        if(this.$store.state.user.step==4){

          return 'ComputerKnowledge'
        }
        if(this.$store.state.user.step==5){

          return 'WorkExperience'
        }
        if(this.$store.state.user.step==6){

          return 'DocumentUpload'
        }
        if(this.$store.state.user.step==7){

          return 'Finish'
        }
      },
      step(){
        return this.$store.state.user.step
      },
      barWidth(){
        if(this.$store.state.user.step==1){
          return 14.28
        }
        if(this.$store.state.user.step==2){
          return 14.28*2
        }
        if(this.$store.state.user.step==3){
          return 14.28*3
        }
        if(this.$store.state.user.step==4){
          return 14.28*4
        }
        if(this.$store.state.user.step==5){
          return 14.28*5
        }
        if(this.$store.state.user.step==6){
          return 14.28*6
        }
        if(this.$store.state.user.step==7){
          return 14.28*7
        }
      }
    },
    mounted(){

    }

  }
</script>

<style>

.form-group span {
  color: red;
  font-size: 12px;
}
.border {
  border: 1px solid red !important;
}
.note {
  color: #007bff;
  background: yellow;
  font-size: 14px;
  padding: 2px 5px;
  width: fit-content;
}
</style>
