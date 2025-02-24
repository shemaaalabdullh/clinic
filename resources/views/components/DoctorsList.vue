<template>
    <div>
        <h2>قائمة الأطباء</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>التخصص</th>
                    <th>البريد الإلكتروني</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="doctor in doctors" :key="doctor.id">
                    <td>{{ doctor.name }}</td>
                    <td>{{ doctor.specialization }}</td>
                    <td>{{ doctor.email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            doctors: []
        };
    },
    mounted() {
        fetch('/api/doctors')
            .then(response => response.json())
            .then(data => {
                this.doctors = data;
            });
    }
};
</script>
