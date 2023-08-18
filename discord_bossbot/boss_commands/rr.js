module.exports = {
    name: 'rr',
    description: 'Reaction Roles setup',
    execute(bot, message, args, VARSET) {
        if(args.length !== 2) return message.channel.send("Usage: +rr [Message ID] [@Role]",{code : "css"});

        if(!message.member.hasPermission("ADMINISTRATOR")) return message.channel.send("- Error: No you can't set reaction roles!",{code : "diff"});
        let serverID = message.guild.id;
        let serverName = message.guild.name;
        let msgID = args[0];
        let rRoleID = getRoleID(args[1]);
        const reactionRoles = require("./reactionroles.json");

        if((serverID in reactionRoles)){
          console.log("serverid found");
          let serverFound = reactionRoles[serverID];

          if(msgID in serverFound.messages){
            fs.readFile("reactionroles.json", "utf8" ,function(err, data){
              if (err){ console.log(err);
              }else{
                var json = JSON.parse(data);
                json[serverID].messages[msgID] = rRoleID;

                fs.writeFile("reactionroles.json", JSON.stringify(json), function(err){
                  if (err){
                    throw err;
                  }else{console.log('The file has been saved and updated with a new role')}
                });
              }
            });
            message.channel.send("We have successfully updated message id with new role id!",{code : "css"});

          }else{
            fs.readFile("reactionroles.json", "utf8" ,function(err, data){
              if (err){ console.log(err);
              }else{
                var json = JSON.parse(data);
                json[serverID].messages[msgID] = rRoleID;

                fs.writeFile("reactionroles.json", JSON.stringify(json), function(err){
                  if (err){
                    throw err;
                  }else{console.log('The file has been saved with a new reaction role')}
                });
                message.channel.send("We have successfully added new message id and role id!",{code : "css"});
              }
            });
          }
        }else{
          fs.readFile("reactionroles.json", "utf8" ,function(err, data){
            if (err){ console.log(err);
            }else{
              var json = JSON.parse(data);
              json[serverID] = {
                "serverName" : serverName,
                "messages" :{
                  [msgID] :rRoleID
                }
              };

              fs.writeFile("reactionroles.json", JSON.stringify(json), function(err){
                if (err){
                  throw err;
                }else{console.log('The file has been saved and updated new server')}
              });
            }
          });

          message.channel.send("You have successfully updated reaction roles",{code : "css"});
        }
    },
};
