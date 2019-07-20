var myObjk = {
    name : "muhammad ari qoiriman",
    age : 24,
    address : "jl menganti wiyung 1 rt 2 rw 2 suarabaya",
    hobbies : ["bulutangkasi", "membaca"],
    is_married : false,
    list_school : {
        name : "SMK YPM 1 taman",
        year_in : "2010",
        year_out : "2013",
        major : "TKJ"
    },
    skills : {
        skill_name : ["php", "javascript", "html"],
        level : ["beginner", "advanced","expert"]
    },
    interest_in_coding : true
};
var myJson = JSON.stringify(myObjk);
console.log(myJson); 