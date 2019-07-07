<template>
    <div class="user-dashboard">
        This is user dashboard
        <div class="list-user-comp">
            <h4>List User</h4>
            <ListUser @userSelected="childrenSelectUser"></ListUser>
        </div>
        <hr>
        <div class="user-detail-comp">
            <h4>User Detail</h4>
            <UserDetail :userDetailInfo="userSelectedFromChild"></UserDetail>
        </div>
    </div>
</template>

<script>
	import ListUser from './ListUser.vue'
    import UserDetail from './UserDetail.vue'
    export default {
        components: {
            ListUser,
            UserDetail
        },
        methods: {
            // Process event emitted from child
            childrenSelectUser(user) {
                console.log(user)
                this.userSelectedFromChild = user
            }
        },
        data() {
            return {
                userSelectedFromChild: {}
            }
        },
    }

    
    
</script>

<style lang="scss" scoped>
</style>
