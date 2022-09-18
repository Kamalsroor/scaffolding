import {useI18n} from 'vue-i18n';


/**
 * Simulate a login
 * @param {string} a
 * @param {string} p
 */
function translate(string, opject) {
    return string;
  const {t} = useI18n();
  return t(string, opject);
}



export default {
    namespaced: true,
    state:{
        menu: [
            "OVERVIEW",
            {
              icon: "MonitorIcon",
              pageName: "dashboard",
              title: "Event Dashboard",
              // permission:['test']
            },
            {
              icon: "ListIcon",
              pageName: "common-data",
              title: "Common Data",
              subMenu: [
                {
                  pageName: "services",
                  title: translate('services.plural'),
                  permission: ['list-service'],
                },
                {
                  pageName: "certificates",
                  title: translate('certificates.plural'),
                  permission: ['list-certificate'],
                },
                {
                  pageName: "referrals",
                  title: translate('referrals.plural'),
                  permission: ['list-referral'],
                },
                {
                  pageName: "countries",
                  title: translate('countries.plural'),
                  permission: ['list-country'],
                },
                {
                  pageName: "sliders",
                  title: translate('sliders.plural'),
                  permission: ['list-slider'],
                },

              ]
            },

            {
              icon: "ListIcon",
              pageName: "reports",
              title: "Reports",
              subMenu: [
                {
                  pageName: "one_to_one_list",
                  title: translate('reports.one_to_one_list'),
                },
                {
                  pageName: "delegate_has_login",
                  title: translate('reports.delegate_has_login'),
                },
                {
                  pageName: "dietary_report",
                  title: translate('reports.dietary_report'),
                },
              ]
            },


            {
              icon: "ListIcon",
              pageName: "event-data",
              title: "Event Data",
              subMenu: [
                {
                  pageName: "tshirt_sizes",
                  title: translate('tshirt_sizes.plural'),
                  permission: ['list-tshirt-size'],
                },
                {
                  pageName: "sponsors",
                  title: translate('sponsors.plural'),
                  permission: ['list-sponsor'],
                },
                {
                  pageName: "dietaries",
                  title: translate('dietaries.plural'),
                  permission: ['list-dietary'],
                },
                {
                  pageName: "room_types",
                  title: translate('room_types.plural'),
                  permission: ['list-room_type'],
                },
                {
                  pageName: "index_delegates",
                  title: translate('delegates.plural'),
                  permission: ['list-delegate'],
                },
                {
                  pageName: "companies",
                  title: "Companies",
                  subMenu: [
                    {
                      pageName: "index_companies",
                      query :{type:'all' , registerd : false},

                      title: "All Companies",
                    },
                    {
                      pageName: "index_companies",
                      query :{type:'member' , registerd : false},
                      title: "All Members",
                    },
                    {
                      pageName: "index_companies",
                      query :{type:'non-member' , registerd : false},
                      title: "All Non Members",
                    },
                    {
                      pageName: "index_companies",
                      query :{type:'non-member' , registerd : true},
                      title: "Registerd Non Members",
                    },
                    {
                      pageName: "index_companies",
                      query :{type:'member' , registerd : true},
                      title: "Registerd Members",
                    },
                    {
                      pageName: "index_companies",
                      query :{type:'all' , registerd : true},
                      title: "All Registerd Members",
                    },
                    // {
                    //   pageName: "store_orders",
                    //   title: "Add New Order",
                    // },

                  ]
                },
                {
                  pageName: "orders",
                  title: "Orders",
                  subMenu: [
                    {
                      pageName: "index_orders",
                      title: "All Orders",
                    },
                    // {
                    //   pageName: "store_orders",
                    //   title: "Add New Order",
                    // },

                  ]
                },

              ]
            },
            {
              icon: "ListIcon",
              pageName: "general",
              title: "General",
              subMenu: [
                {
                  pageName: "settings",
                  title: translate('settings.plural'),
                },
                {
                  pageName: "settings_page",
                  params :{page:'home'},
                  title: translate('page.home'),
                },
                {
                  pageName: "settings_page",
                  params :{page:'pricing'},
                  title: translate('page.pricing'),
                },
                {
                  pageName: "settings_page",
                  params :{page:'visa'},
                  title: translate('page.visa'),
                },
                {
                  pageName: "settings_page",
                  params :{page:'agenda'},
                  title: translate('page.agenda'),
                },

              ]
            },
          ],
    },
}


//
// subMenu: [
//   {
//     icon: "",
//     pageName: "dashboard-overview-1",
//     title: "Overview 1",
//   },
// ],
