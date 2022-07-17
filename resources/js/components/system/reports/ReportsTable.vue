<template>
  <v-container>
    <v-row>
      <v-col cols="12" sm="16" md="12">

        <v-card>
          <v-data-table
            :headers="headers"
            :items="data"
            dense
            class="elevation-1 table-striped"
          >
            <template v-slot:top>
              <v-toolbar flat>
                <v-toolbar-title>{{formattedTitle}}: {{data.length}}</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
              </v-toolbar>
            </template>
          </v-data-table>
        </v-card>
      </v-col>
      <v-col cols="12">
        <!-- <v-card v-show="report == 'request_reports'">
          <v-data-table
            :headers="fileRequestReportsTableHeader"
            :items="filerequestreports"
            dense
            class="elevation-1 table-striped"

          >
            <template v-slot:top>
              <v-toolbar flat>
                <v-toolbar-title>File Requests Reports Table</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
              </v-toolbar>
            </template>
          </v-data-table>
        </v-card> -->
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import jsPDF from 'jspdf'
import 'jspdf-autotable'

export default {
  props: ["period", "data", "filerequestreports","report"],
  data() {
    return {
        table_title:"",
        icon:"justify",
      //TABLE HEADERS PROPERTIES REQUEST REPORTS
      headers: [],
      //TABLE HEADERS PROPERTIES REQUEST REPORTS
      fileRequestReportsTableHeader: [
        {
          text: "Filename",
          align: "start",
          sortable: true,
          value: "filename",
          class: "info text-black",
        },
        {
          text: "Category",
          value: "category",
          class: "info text-black",
        },
        {
          text: "Total of Requests",
          value: "totalrequests",
          class: "info text-black",
        },
      ],

      //USERS PROPERTIES
      users: [],
      selectedUser: null,
      editedIndex: -1,
      usertype: ["Chief", "Staff"],
    };
  },
    computed: {
        formattedTitle()
        {
            switch (this.report){
                case 'request_reports':
                    return 'Total No. Of Requested Records';
                break;
                case 'upload_reports':
                    return `${this.period} Document Reports`;
                break;
            }
        }
    },
  created() {
      if(this.report === 'request_reports') {
          this.headers.push({
          text: "User ID",
          align: "start",
          sortable: true,
          value: "date_uploaded",
          class: "info text-black",
        },
        {
          text: "File name",
            value: "filename",
          class: "info text-black",
        },
        {
          text: "Category",
            value: "category",
          class: "info text-black",
        },
        {
          text: "Purpose",
            value: "purpose",
          class: "info text-black",
        },
        {
          text: "Attached File",
            value: "file_location",
          class: "info text-black",
        },
        {
          text: "Req. Date",
            value: "request_date",
          class: "info text-black",
        })
      }else {
           this.headers.push({
          text: "Date Uploaded",
          align: "start",
          sortable: true,
          value: "date_uploaded",
          class: "info text-black",
        },
         {
          text: "Ref code",
          value: "code",
          class: "info text-black",
        },
        {
          text: "File name",
          value: "filename",
          class: "info text-black",
        },
        {
          text: "Category",
          value: "category",
          class: "info text-black",
        },
        {
          text: "Retention date",
          value: "retention_date",
          class: "info text-black",
        },
        )
      }
  }
};
</script>
